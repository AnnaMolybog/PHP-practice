<?php

namespace App\AppBundle\Service;

class PathGenerator
{
    const PATH_MASK = '%s_%s';
    const SPACE_PATTERN = ' ';
    const REPLACE_WITH = '_';

    /**
     * @param string $name
     * @return string
     */
    public function generatePath(string $name): string
    {
        return sprintf(
            self::PATH_MASK,
            str_replace(self::SPACE_PATTERN, self::REPLACE_WITH, strtolower($name)),
            uniqid()
        );
    }
}
