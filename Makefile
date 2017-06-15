.PHONY: test docs

all:
	@echo "Please choose a task."

lint:
	composer validate

test:
	codecept run acceptance

docs:
	cd src/Resources/doc && sphinx-build -b html -d _build/doctrees . _build/html
