from django import template
from django.conf import settings

register = template.Library()

@register.inclusion_tag("tags/thumbnail.html")
def thumb(name, left=False):
    return { 'name': name, 'left': left }

@register.inclusion_tag("tags/dew.html")
def dew_player(xml_name):
    return { 'xml': xml_name }

@register.inclusion_tag('tags/metrica.html')
def metrica():
    return {
        'enable': settings.METRICA,
        'webvisor': settings.METRICA_WEBVISOR,
    }

@register.inclusion_tag('tags/social.html')
def social():
    return { 'enable': settings.SOCIAL }
