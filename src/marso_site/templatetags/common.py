import random
from django import template

register = template.Library()

@register.simple_tag()
def rand(min, max):
    return random.randint(min, max)
