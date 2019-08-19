<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Codedge\Fpdf\Facades\Fpdf;

class FpdfServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public static function generate($post)
    {
        Fpdf::AddPage();

        //Background-1
        Fpdf::Image(get_template_directory_uri().'/dist/img/pdf-bg-1.png', -15, 49, 90);
        
        // Logo
        Fpdf::Image(get_template_directory_uri().'/dist/img/logo.png');

        $x = Fpdf::GetX() + 1;
        $y = 50;

        Fpdf::SetXY($x, $y);
        
        // Title
        Fpdf::SetFont('Helvetica', 'B', 14);
        Fpdf::MultiCell(60, 7, utf8_decode($post->post_title), 0, "L");
        
        // Description
        Fpdf::SetXY($x + 74, $y);
        Fpdf::SetFont('Helvetica', '', 10);
        Fpdf::MultiCell(107, 6, FpdfServiceProvider::sanitize(get_field("description", $post->ID)), 0, "L");
        
        Fpdf::Ln();

        $x = Fpdf::GetX() + 1;
        $y = Fpdf::GetY() + 20;

        //Background-2
        Fpdf::Image(get_template_directory_uri().'/dist/img/pdf-bg-2.png', $x-5, $y-1.5, 185);


        // Datas
        FpdfServiceProvider::writeTableCell(
            "Entreprise", 
            FpdfServiceProvider::sanitize(get_field("entreprise", $post->ID)), 
            $x, $y, 0);
        FpdfServiceProvider::writeTableCell(
            utf8_decode("Réalisation"), 
            FpdfServiceProvider::sanitize(get_field("realisation", $post->ID)), 
            $x, $y, 1);
        FpdfServiceProvider::writeTableCell(
            utf8_decode("Coûts"), 
            FpdfServiceProvider::sanitize(get_field("prestation", $post->ID)), 
            $x, $y, 2);
        FpdfServiceProvider::writeTableCell(
            "Prestation", 
            FpdfServiceProvider::sanitize(get_field("couts", $post->ID)), 
            $x, $y, 3);
        FpdfServiceProvider::writeTableCell(
            "Divers", 
            FpdfServiceProvider::sanitize(get_field("divers", $post->ID)), 
            $x, $y, 4);

        $x = Fpdf::GetX() + 1;
        $y = Fpdf::GetY() + 20;

        // Galerie  
        $gallery = get_field("galerie", $post->ID);

        if ($gallery) {
            try {
                Fpdf::Image($gallery[0]['sizes']['reference_thumbnail_2x'], $x, $y, 117);
                Fpdf::Image($gallery[1]['sizes']['reference_thumbnail_2x'], $x + 122, $y, 55);
                Fpdf::Image($gallery[2]['sizes']['reference_thumbnail_2x'], $x + 122, $y + 39, 55);
            } catch (\Throwable $th) {
                // Less than 3 pictures
            }
        }

        //Background-3
        Fpdf::SetY(-15);
        Fpdf::Image(get_template_directory_uri().'/dist/img/pdf-bg-3.png', 12, Fpdf::GetY(), 15);

        return Fpdf::Output("s");
    }

    private static function writeTableCell($title, $content, $x, $y, $col) {
        Fpdf::SetXY($x + (37 * $col), $y);
        Fpdf::SetFont('Helvetica', 'B', 11);
        Fpdf::MultiCell(35, 5, $title, 0, "L");
        Fpdf::SetXY($x + (37 * $col), $y + 8);
        Fpdf::SetFont('Helvetica', '', 9);
        Fpdf::MultiCell(35, 5, $content, 0, "L");
    }

    private static function sanitize($content) {
        return iconv('UTF-8', 'windows-1252', strip_tags(stripslashes($content)));
    }
}
