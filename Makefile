.PHONY: test docs

all:
	@echo "Please choose a task."

lint:
	echo hello
	#composer validate --no-check-lock

test:
	echo hello

docs:
	echo hello
	#cd src/Resources/doc && sphinx-build -b html -d _build/doctrees . _build/html
