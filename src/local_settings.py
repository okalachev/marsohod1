# encoding: utf-8
# Development settings
from settings import *

METRICA = False
SOCIAL = False

DEBUG = True
TEMPLATE_DEBUG = True

INSTALLED_APPS += (
    'django.contrib.staticfiles',
    'debug_toolbar',
)

INTERNAL_IPS = ('127.0.0.1',)

MIDDLEWARE_CLASSES += (
    'debug_toolbar.middleware.DebugToolbarMiddleware',
)

ENABLE_AUTO_THUMBS = True
