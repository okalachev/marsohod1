# encoding: utf-8
# Development settings
from settings import *
import os.path

METRICA = False
SOCIAL = False

DEBUG = True
TEMPLATE_DEBUG = True

MEDIA_FOLDER = path.join(PROJECT_PATH, '..', 'media')

STATICFILES_DIRS = (
    MEDIA_FOLDER,
)

STATICFILES_FINDERS = (
    'django.contrib.staticfiles.finders.FileSystemFinder',
    'django.contrib.staticfiles.finders.AppDirectoriesFinder',
    #    'django.contrib.staticfiles.finders.DefaultStorageFinder',
)

INSTALLED_APPS += (
    'django.contrib.staticfiles',
    'debug_toolbar',
)

INTERNAL_IPS = ('127.0.0.1',)

MIDDLEWARE_CLASSES += (
    'debug_toolbar.middleware.DebugToolbarMiddleware',
)

ENABLE_AUTO_THUMBS = True
