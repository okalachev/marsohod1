from django.views.generic import TemplateView
from .mixins import Gallery, Album, AlbumWithArtworks

class Index(TemplateView):
    template_name = "index.html"

class Band(Gallery):
    template_name = "band.html"
    gallery_name = "band"

class Pano(TemplateView):
    template_name = "pano.html"

class Calls(TemplateView):
    template_name = "calls.html"

class Video(TemplateView):
    template_name = "video.html"

class Demo1(Gallery, Album):
    template_name = "risunki.html"
    gallery_name = "risunki"
    album_name = "risunki"

class Demo2(Gallery, AlbumWithArtworks):
    template_name = "demo2.html"
    gallery_name = "demo2"
    album_name = "demo2"
    artworks_gallery = 'demo2-artworks'

class Record3(Gallery, AlbumWithArtworks):
    gallery_name = "projections"
    template_name = "record3.html"
    album_name = "record3"
    artworks_gallery = "projections-artworks"

class AlbumXml(Album):
    template_name = 'xml/album.xml'
    lyrics = False

class Demo1Xml(AlbumXml, Demo1):
    pass

class Demo2Xml(AlbumXml, Demo2):
    pass
