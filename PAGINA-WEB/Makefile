SHELL := /bin/bash
.PHONY: build clean release

VERSION = 1.0.0
SRC_DIR = src
DIST_DIR = dist
RELEASE_DIR = release

build:
	@echo "Construyendo version de produccion..."
	mkdir -p $(DIST_DIR)

	# Copiar scripts PHP
	mkdir -p $(DIST_DIR)/php
	cp $(SRC_DIR)/php/*.php $(DIST_DIR)/php/

	# Copiar recursos (CSS, JS, IMG)
	mkdir -p $(DIST_DIR)/assets/css $(DIST_DIR)/assets/js $(DIST_DIR)/assets/img
	cp -r $(SRC_DIR)/assets/css/* $(DIST_DIR)/assets/css/
	cp -r $(SRC_DIR)/assets/js/* $(DIST_DIR)/assets/js/
	cp -r $(SRC_DIR)/assets/img/* $(DIST_DIR)/assets/img/

	# Copiar scripts SQL
	mkdir -p $(DIST_DIR)/sql
	cp $(SRC_DIR)/sql/*.sql $(DIST_DIR)/sql/

	# Crear archivo de configuracion de ejemplo
	@printf "<?php\n// Configuracion de la base de datos\ndefine('DB_HOST', 'localhost');\ndefine('DB_USER', 'root');\ndefine('DB_PASS', '');\ndefine('DB_NAME', 'escuela_canto');\n?>" > $(DIST_DIR)/php/config-sample.php

	@echo "Build completado!"

release: build
	@echo "Preparando paquete de instalacion..."
	mkdir -p $(RELEASE_DIR)
	cd $(DIST_DIR) && zip -r ../$(RELEASE_DIR)/aula_musica_$(VERSION).zip .
	@printf "Version $(VERSION) - Aula Virtual de Musica\nLanzado: $(shell date)\n" > $(RELEASE_DIR)/VERSION.txt
	@printf "Instalacion:\n1. Descomprima el ZIP en su servidor web\n2. Importe la base de datos:\n   mysql -u usuario -p escuela_canto < sql/escuela_canto.sql\n3. Renombre php/config-sample.php a config.php y configure sus credenciales\n" > $(RELEASE_DIR)/INSTALL.txt
	@echo "Paquete creado en $(RELEASE_DIR)/"

clean:
	rm -rf $(DIST_DIR) $(RELEASE_DIR)
