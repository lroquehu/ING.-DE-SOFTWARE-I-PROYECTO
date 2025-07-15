# Makefile para Aula Virtual de Música
.PHONY: build clean release

VERSION = 1.0.0
SRC_DIR = src
DIST_DIR = dist
RELEASE_DIR = release

build:
	@echo "Construyendo versión de producción..."
	
	# Crear estructura de directorios
	mkdir -p $(DIST_DIR)/php
	mkdir -p $(DIST_DIR)/assets/img
	mkdir -p $(DIST_DIR)/sql
	
	# 1. Copiar y optimizar archivos PHP
	cp $(SRC_DIR)/php/*.php $(DIST_DIR)/php/
	
	# 2. Copiar recursos (imágenes)
	cp -r $(SRC_DIR)/assets/img/* $(DIST_DIR)/assets/img/
	
	# 3. Copiar scripts SQL
	cp $(SRC_DIR)/sql/*.sql $(DIST_DIR)/sql/
	
	# 4. Crear archivo de configuración de ejemplo
	echo "<?php\n// Configuración de la base de datos\ndefine('DB_HOST', 'localhost');\ndefine('DB_USER', 'tu_usuario');\ndefine('DB_PASS', 'tu_password');\ndefine('DB_NAME', 'escuela_canto');\n?>" > $(DIST_DIR)/php/config-sample.php
	
	@echo "✅ Build completado! Directorio: $(DIST_DIR)"

release: build
	@echo "Preparando paquete de instalación..."
	mkdir -p $(RELEASE_DIR)
	
	# 1. Crear ZIP principal
	zip -r $(RELEASE_DIR)/aula_musica_$(VERSION).zip $(DIST_DIR)/*
	
	# 2. Crear archivos de documentación
	echo "Versión $(VERSION) - Aula Virtual de Música\nLanzado: $(shell date)" > $(RELEASE_DIR)/VERSION.txt
	
	echo "Instalación:\n1. Descomprima el ZIP en su servidor web\n2. Importe la base de datos:\n   mysql -u usuario -p escuela_canto < sql/escuela_canto.sql\n3. Renombre config-sample.php a config.php y configure sus credenciales" > $(RELEASE_DIR)/INSTALL.txt
	
	# 3. Copiar scripts SQL por separado
	cp $(DIST_DIR)/sql/*.sql $(RELEASE_DIR)/
	
	@echo "📦 Paquete creado en $(RELEASE_DIR)/"

clean:
	rm -rf $(DIST_DIR) $(RELEASE_DIR)
	@echo "🧹 Directorios de build eliminados"