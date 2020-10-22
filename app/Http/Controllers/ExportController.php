<?php

namespace App\Http\Controllers;

use App\Models\Export;
use Illuminate\Http\Request;

class ExportController extends Controller
{
  public function Excel(Request $req)
  {
    return Export::ExportExcel($req);
  }
}
