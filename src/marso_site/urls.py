from django.conf.urls import patterns, url
from .views import *

urlpatterns = patterns('',
    url(r'^$', Index.as_view(), name="index"),
    url(r'^band/$', Band.as_view(), name="band"),
    url(r'^base/$', Pano.as_view(), name="pano"),
    url(r'^calls/$', Calls.as_view(), name="calls"),
    url(r'^video/$', Video.as_view(), name="video"),

    url(r'^records/risunki/$', Demo1.as_view(), name="demo1"),
    url(r'^risunki.xml$', Demo1Xml.as_view()),

    url(r'^records/demo2/$', Demo2.as_view(), name="demo2"),
    url(r'^demo2.xml$', Demo2Xml.as_view()),

    url(r'^records/projections/$', Record3.as_view(), name="record3"),
)
