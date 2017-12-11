#!/usr/bin/env sh

cd src/LisemBundle/Resources/doc
sphinx-build -b html -d _build/doctrees . _build/html
