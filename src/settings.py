# encoding: utf-8
from os import path

PROJECT_PATH = path.dirname(__file__)

DEBUG = False
TEMPLATE_DEBUG = False

TIME_ZONE = 'Europe/Moscow'
LANGUAGE_CODE = 'ru-ru'

SITE_ID = 1

USE_I18N = False
USE_L10N = True

MEDIA_ROOT = ''
MEDIA_URL = ''
STATIC_ROOT = ''
STATIC_URL = '/media/'

#ADMIN_MEDIA_PREFIX = '/static/admin/'

MEDIA_FOLDER = path.realpath(PROJECT_PATH + '/../media')

STATICFILES_DIRS = (
    MEDIA_FOLDER,
)

STATICFILES_FINDERS = (
    'django.contrib.staticfiles.finders.FileSystemFinder',
    'django.contrib.staticfiles.finders.AppDirectoriesFinder',
#    'django.contrib.staticfiles.finders.DefaultStorageFinder',
)

SECRET_KEY = 'zdd5depwr4i+kv*$v_xwed1fwlg8r-&otql5qpc1^%+yl=$ye4'

TEMPLATE_LOADERS = (
    'django.template.loaders.filesystem.Loader',
    'django.template.loaders.app_directories.Loader',
#     'django.template.loaders.eggs.Loader',
)

MIDDLEWARE_CLASSES = (
    'django.middleware.common.CommonMiddleware',
#    'django.contrib.sessions.middleware.SessionMiddleware',
#    'django.middleware.csrf.CsrfViewMiddleware',
#    'django.contrib.auth.middleware.AuthenticationMiddleware',
#    'django.contrib.messages.middleware.MessageMiddleware',
)

ROOT_URLCONF = 'urls'

#TEMPLATE_DIRS = (
#)

from django.conf.global_settings import TEMPLATE_CONTEXT_PROCESSORS
TEMPLATE_CONTEXT_PROCESSORS += (
    'marso_site.context_processors.global_settings',
)

INSTALLED_APPS = (
#    'django.contrib.auth',
#    'django.contrib.contenttypes',
#    'django.contrib.sessions',
#    'django.contrib.sites',
#    'django.contrib.messages',
    'marso_site'
    # Uncomment the next line to enable the admin:
    # 'django.contrib.admin',
    # Uncomment the next line to enable admin documentation:
    # 'django.contrib.admindocs',
)

DATA_ROOT = path.realpath(PROJECT_PATH + '/../data')

# Включить Яндекс.Метрику
METRICA = True

# Включить Вебвизор в Яндекс.Метрике
METRICA_WEBVISOR = True

# Включить социальные кнопочки
SOCIAL = True

# Папка с фотками
GALLERY_DIR = path.realpath(MEDIA_FOLDER + '/gallery')

# Включить автогенерацию превьюшек
ENABLE_AUTO_THUMBS = False

try:
    from local_settings import *
except ImportError:
    pass
