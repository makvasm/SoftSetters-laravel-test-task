<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Export extends Model
{
  use HasFactory;

  private static $cells = ['ФИО автора', 'Кол-во страниц', 'Год выпуска', 'Издатель'];

  private static function CreateSpreadsheet($data)
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->fromArray(Export::$cells);

    $sheet->setCellValue('A2', $data['author']);
    $sheet->setCellValue('B2', $data['book']->page_count);
    $sheet->setCellValue('C2', $data['book']->year);
    $sheet->setCellValue('D2', $data['book']->publisher);

    return $spreadsheet;
  }

  public static function ExportExcel($req)
  {
    $book = Book::get($req);
    $author = $book->author;
    $data = [
      'book' => $book,
      'author' => "{$author->name} {$author->surname} {$author->patronymic}"
    ];

    $sheet = Export::CreateSpreadsheet($data);

    $content_type = 'application/vnd.ms-excel';
    $filename = config('app.export_name');
    $ext = '.xlsx';

    return Export::Export($sheet, $content_type, $filename, $ext);
  }

  private static function Export($spreadsheet, $content_type, $filename, $ext)
  {
    $writer = new Xlsx($spreadsheet);

    // stackoverflow.com/questions/50993968
    $response =  new StreamedResponse(
      function () use ($writer) {
        $writer->save('php://output');
      }
    );

    $response->headers->set('Content-Type', $content_type);
    $response->headers->set('Content-Disposition', "attachment;filename={$filename}{$ext}");
    $response->headers->set('Cache-Control', 'max-age=0');

    return $response;
  }
}
