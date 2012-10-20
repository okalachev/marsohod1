include passwd.mk

MIRROR = mirror --verbose --reverse --exclude ___
release:
	@lftp -c "open ftp://$(USER):$(PASS)@marsohod1.ru; \
	$(MIRROR) src /django/marso/ --exclude local_settings.py --exclude .pyc; \
	$(MIRROR) data /django/marso/; \
	$(MIRROR) media /domains/marsohod1.ru/ ; \
	$(MIRROR) root /domains/marsohod1.ru; \
	chmod -R 700 /django/marso/; \
	chmod -R 700 /domains/marsohod1.ru/;"

.PHONY: release
