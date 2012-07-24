from django.views.generic import TemplateView
from .gallery import get_gallery, get_gallery_image

def read_yaml(name):
    from django.conf import settings
    try:
        file = open("%s/%s.yaml" % (settings.DATA_ROOT, name))
    except IOError:
        file = open("%s/auto/%s.yaml" % (settings.DATA_ROOT, name))
    import yaml
    return yaml.load(file)


class Gallery(TemplateView):
    gallery_name = None
    thumbnail_size = (1000, 120)

    def get_context_data(self, **kwargs):
        context = super(Gallery, self).get_context_data(**kwargs)
        context['images'] = get_gallery(self.gallery_name, self.thumbnail_size)
        return context


class Album(TemplateView):
    album_name = None
    lyrics = True

    def get_context_data(self, **kwargs):
        context = super(Album, self).get_context_data(**kwargs)

        album = read_yaml(self.album_name)
        context['album'] = album

        if self.lyrics:
            lyrics = read_yaml("lyrics")
            for track in album['tracks']:
                track['lyrics'] = lyrics[track['title']] if track['title'] in lyrics else None

        return context


class AlbumWithArtworks(Album):
    artworks_gallery = None
    artworks_thumb_size = (5000, 350)
    artwork_name = '%d.jpg'

    def get_context_data(self, **kwargs):
        context = super(AlbumWithArtworks, self).get_context_data(**kwargs)

        for number, track in enumerate(context['album']['tracks']):
            track['artwork'] = get_gallery_image(
                self.artworks_gallery, self.artwork_name % (number + 1), self.artworks_thumb_size
            )

        return context
