from django.views.generic import TemplateView

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

    def get_context_data(self, **kwargs):
        context = super(Gallery, self).get_context_data(**kwargs)
        context['images'] = read_yaml('%s.photo' % self.gallery_name)
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
    artwork_path = None

    def get_context_data(self, **kwargs):
        context = super(AlbumWithArtworks, self).get_context_data(**kwargs)

        for number, track in enumerate(context['album']['tracks']):
            track['artwork'] = self.artwork_path % (number + 1)

        return context
