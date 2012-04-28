from django.conf import settings

def global_settings(request):
    return {
        'enable_metrica': settings.METRICA,
        'enable_social': settings.SOCIAL,
    }
