<?php

namespace App\Http\Services;

use Shuchkin\SimpleXLSX;
use SimpleExcel\SimpleExcel;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class TableFileParser {

    private $file;
    private $path;
    private $fileExtension;

    public function __construct(UploadedFile $file)
    {
        Storage::putFileAs('', $file, $file->getClientOriginalName());
        $this->file = $file;
        $this->path = Storage::path('') . $this->file->getClientOriginalName();
        $this->fileExtension = $file->getClientOriginalExtension();
    }

    public function parse()
    {
        switch($this->fileExtension)
        {
            case 'csv': return $this->CSVParser();
            case 'xml': return $this->XMLParser();
            case 'xlsx': return $this->XLSXParser();
            default:
                return false;
        }
    }

    public function XMLParser()
    {
        $xml = simplexml_load_file($this->path);
        $rows = [];
        foreach($xml->children() as $book)
        {
            $rows[] = [
               (string) $book->name,
               (string) $book->author,
               (string) $book->publisher,
               (string) $book->published_date
            ];
        }

        return $rows;
    }

    public function XLSXParser()
    {
        $parser = SimpleXLSX::parse($this->path);
        if(!$parser)
            throw new \Exception('Unsupported file');
        Storage::delete($this->path);
        $rows = $parser->rows();
        array_shift($rows);
        return $rows;
    }

    public function CSVParser(){
        $rows = [];
        try {
            $parser = (new SimpleExcel($this->fileExtension))->parser;
            $parser->loadFile($this->path);
            for ($i = 1;$parser->isRowExists($i);$i++) {
                $rows[] = $parser->getRow($i);
            }
            array_shift($rows);
        }
        catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
        Storage::delete($this->path);
        return $rows;
    }
}