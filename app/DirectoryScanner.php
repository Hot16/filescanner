<?
require_once 'DbConnect.php';

class DirectoryScanner
{
    public $tree = [];

    public function __construct($path)
    {
        $db = new DbConnect();
        $this->tree = $db->query('SELECT * FROM files');

    }

    static function getTree(){
        $path = $_SERVER['DOCUMENT_ROOT'];
        $fileIterator = new FilesystemIterator($path);

        foreach ($fileIterator as $item){
            $tree[] = [
                'name' => $item->getFilename(),
                'size' => ($item->isDir()) ? 'DIR' : $item->getSize(),
                'extension' => ($item->isDir()) ? '' : $item->getExtension(),
                'modification' => date('d-m-Y', $item->getMTime())
                    ];
        };
        return $tree;
//        $fileIterator = scandir($path);
    }
}