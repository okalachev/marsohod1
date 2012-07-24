from django.conf import settings
from os import listdir
from os.path import exists, join, split
from .decorators import memoize

GALLERY_DIR = settings.GALLERY_DIR
PICTURE_SUFFIX = '.jpg'
THUMBNAIL_SUFFIX = '.thumb.jpg'

@memoize
def get_thumbnail(file, thumbnail_size):
    thumb = file.lower().replace(PICTURE_SUFFIX, THUMBNAIL_SUFFIX)
    if not exists(thumb) and settings.ENABLE_AUTO_THUMBS:
        # Thumbnail don't exist
        from PIL import Image
        print "Generating thumbnail for %s" % file
        image = Image.open(file)
        image.thumbnail(thumbnail_size, Image.ANTIALIAS)
        image.save(thumb, quality=95)
    return split(thumb)[-1]


def get_gallery_image(gallery, image, *args):
    return {
        'image': join(gallery, image),
        'thumbnail': join(gallery, get_thumbnail(join(GALLERY_DIR, gallery, image), *args))
    }


@memoize
def get_gallery(gallery, *args):
    folder = join(GALLERY_DIR, gallery)
    images = filter(lambda f: f.lower().endswith(PICTURE_SUFFIX) and not f.lower().endswith(THUMBNAIL_SUFFIX), listdir(folder))
    return map(lambda image: get_gallery_image(gallery, image, *args), images)
