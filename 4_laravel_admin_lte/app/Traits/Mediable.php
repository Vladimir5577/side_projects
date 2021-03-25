<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Str;
use Spatie\Image\Manipulations;
use Illuminate\Http\UploadedFile;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait Mediable
{
    /** @var string */
    public static string $collection = 'photo';

    /** @var string */
    private static string $previewConversation = 'thumb';

    /** @var int */
    private static int $defaultQualityPreview = 80;

    /** @var int */
    private static int $defaultWidthPreview = 300;

    /** @var int */
    private static int $defaultHeightPreview = 300;

    /**
     * Get photo url.
     *
     * @return string|null
     */
    public function getPhotoAttribute(): ?string
    {
        $media = $this->getFirstMedia(static::$collection);

        return $media ? $media->getUrl(static::$previewConversation) : null;
    }

    /**
     * Save photo.
     *
     * @param $path
     *
     * @throws Exception
     */
    public function setPhotoAttribute($path) : void
    {
        if ($path instanceof UploadedFile) {
            $this->clearMediaCollection(self::$collection);
            $this->addMedia($path)
                ->usingFileName(Str::random(30))
                ->toMediaCollection(self::$collection);
        } elseif (filter_var($path, FILTER_VALIDATE_URL)) {
            $this->addMediaFromUrl($path)
                ->usingFileName(Str::random(30))
                ->toMediaCollection(self::$collection);
        }
    }

    /**
     * thumb.
     *
     * @param Media|null $media
     *
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion(static::$previewConversation)
            ->quality(static::$defaultQualityPreview)
            ->format(Manipulations::FORMAT_JPG)
            ->width(static::$defaultWidthPreview)
            ->height(static::$defaultHeightPreview);
    }
}
