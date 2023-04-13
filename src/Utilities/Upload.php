<?php

	namespace App\Utilities;

    use Cocur\Slugify\Slugify;

	class Upload{

        /**
         * Retourne le nom d'un fichier dans un format stockable
         * @param $name
         * @param $file
         * @param $time
         * @return string
         */
        public function createName($name, $file, $time){

            $slugify = new Slugify();

            $nameInfo = pathinfo($file.strtolower($name), PATHINFO_FILENAME);
            $nameExt =  pathinfo($file.strtolower($name), PATHINFO_EXTENSION);
            $nameSlug = $slugify->slugify($nameInfo);
            $nameSlugExt = $nameSlug.'-'.$time.'.'.$nameExt;

            return $nameSlugExt;

        }

	}

?>