<?php
define('THUMBNAIL_WIDTH', 680);
define('THUMBNAIL_HEIGHT', 451);
class Car {
    private static $Car_Class_Indexer = 0;
    public $maker;
    public $model_name;
    public $description;
    public $price;
    public $thumbnail_path;
    public $image_path;
    public $dbId;

    public function __construct(string $maker, string $model_name, int $price, string $description) {
        $this->maker = $maker;
        $this->model_name = $model_name;
        $this->price = $price;
        $this->description = $description;
        $this->thumbnail_path = './images/cars/thumbnails/'.$this.'.webp';
        $this->image_path = './images/cars/'.$this.'.png';
        $this->generateThumbnail();

        $this->dbId = self::$Car_Class_Indexer++;
    }

    private static function imageCreateFromFile(string $filename) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $file_mime_type = finfo_file($finfo, $filename);
        switch ($file_mime_type) {
            case 'image/jpg':
                return imagecreatefromjpeg($filename);
                break;
            case 'image/png':
                return imagecreatefrompng($filename);
                break;
            case 'image/gif':
                return imagecreatefromgif($filename);
                break;
            case 'image/webp':
                return imagecreatefromwebp($filename);
                break;
            default:
                throw new InvalidArgumentException('File "'.$filename.'" is not a recognized image format.');
            break;
        }
        finfo_close($finfo);
    }

    private function generateThumbnail() {
        if(!file_exists($this->thumbnail_path)) {
            $img_src = Car::imageCreateFromFile($this->image_path);
            $img_dest = imagescale($img_src, THUMBNAIL_WIDTH, THUMBNAIL_HEIGHT);
            imagewebp($img_dest, $this->thumbnail_path);
            imagedestroy($img_src);
            imagedestroy($img_dest);
        }
    }

    public function __toString() {
        return $this->maker . " " . $this->model_name;
    }
}
?>