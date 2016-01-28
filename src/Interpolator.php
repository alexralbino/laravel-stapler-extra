<?php
namespace Mixdinternet\LaravelStaplerExtra;

use \Codesleeve\Stapler\Interfaces\Attachment as AttachmentInterface;
use \Codesleeve\Stapler\Interpolator as BaseInterpolator;

class Interpolator extends BaseInterpolator
{

    /**
     * Merge some interpolation to default
     * @return array
     */
    protected function interpolations()
    {
        $parentInterpolations = parent::interpolations();

        return array_merge($parentInterpolations, [
            ':filename_slugify' => 'filenameSlugify',
            ':class_lower' => 'getClassLower',
            ':class_name_lower' => 'getClassNameLower',
            ':namespace_lower' => 'getNamespaceLower',
        ]);
    }

    /**
     * Returns the file name.
     *
     * @param AttachmentInterface $attachment
     * @param string              $styleName
     *
     * @return string
     */
    protected function filenameSlugify(AttachmentInterface $attachment, $styleName = '')
    {
        return str_slug($this->basename($attachment, $styleName), "-") . '.' . $this->extension($attachment, $styleName);
    }

    /**
     * Returns the current class name (lowercase), taking into account namespaces, e.g
     * 'Swingline\Stapler' will become swingline/stapler.
     *
     * @param AttachmentInterface $attachment
     * @param string              $styleName
     *
     * @return string
     */
    protected function getClassLower(AttachmentInterface $attachment, $styleName = '')
    {
        return strtolower($this->getClass($attachment, $styleName));
    }

    /**
     * Returns the current class name (lowercase), not taking into account namespaces, e.g
     * 'Swingline\Stapler' will become stapler.
     *
     * @param AttachmentInterface $attachment
     * @param string     $styleName
     *
     * @return string
     */
    protected function getClassNameLower(AttachmentInterface $attachment, $styleName = '')
    {
        return strtolower($this->getClassName($attachment, $styleName));
    }

    /**
     * Returns the current class name, exclusively taking into account namespaces (lowercase), e.g
     * 'Swingline\Stapler' will become swingline.
     *
     * @param AttachmentInterface $attachment
     * @param string              $styleName
     *
     * @return string
     */
    protected function getNamespaceLower(AttachmentInterface $attachment, $styleName = '')
    {
        return strtolower($this->getNamespace($attachment, $styleName));
    }

}