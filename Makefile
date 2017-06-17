.PHONY: test docs

all:
	@echo "Please choose a task."

lint:
	composer validate

test:
	./vendor/bin/codecept build
	./vendor/bin/codecept run acceptance

docs:
	cd src/Resources/doc && sphinx-build -b html -d _build/doctrees . _build/html
