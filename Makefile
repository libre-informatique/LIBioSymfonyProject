.PHONY: test docs

all:
	@echo "Please choose a task."

lint:
	composer validate --no-check-lock

test:
	./bin/ci-script/run_test.sh

docs:
	cd src/Resources/doc && sphinx-build -b html -d _build/doctrees . _build/html
