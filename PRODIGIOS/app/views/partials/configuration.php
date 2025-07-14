<!-- Configuration Section -->
<div class="configuracion" style="display:none">
  <h2 class="section-title">Configuración del Sistema</h2>

  <div class="config-row">
    <!-- Configuración de Usuario -->
    <div class="config-card">
      <div class="card-header bg-info text-white">
        <i class="fas fa-user-cog"></i> Configuración de Usuario
      </div>
      <div class="card-body">
        <form>
          <div class="mb-4">
            <label class="form-label fw-medium">Nombre</label>
            <input type="text" class="form-control form-control-lg" value="Luis Miguel Roque Huacca">
          </div>
          <div class="mb-4">
            <label class="form-label fw-medium">Nombre de usuario</label>
            <input type="text" class="form-control form-control-lg" value="Luis Miguel Roque Huacca">
          </div>
          <div class="mb-4">
            <label class="form-label fw-medium">Correo electrónico</label>
            <input type="email" class="form-control form-control-lg" value="luis@gmail.com">
          </div>
          <div class="mb-4">
            <label class="form-label fw-medium">Foto de perfil</label>
            <div class="d-flex align-items-center gap-3">
              <img src="https://via.placeholder.com/80" alt="Foto de perfil" class="img-fluid rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
              <div>
                <button class="btn btn-outline-info btn-sm">Cambiar</button>
                <button class="btn btn-outline-danger btn-sm">Eliminar</button>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-info btn-lg w-100">
            <i class="fas fa-save me-2"></i>Guardar Cambios
          </button>
        </form>
      </div>
    </div>

    <!-- Seguridad -->
    <div class="config-card">
      <div class="card-header bg-warning text-dark">
        <i class="fas fa-lock"></i> Seguridad
      </div>
      <div class="card-body">
        <form>
          <div class="mb-4">
            <label class="form-label fw-medium">Contraseña actual</label>
            <input type="password" class="form-control form-control-lg">
          </div>

          <div class="mb-4">
            <label class="form-label fw-medium">Nueva contraseña</label>
            <input type="password" class="form-control form-control-lg" placeholder="Ingrese nueva contraseña">
            <div class="progress mt-2" style="height: 8px;">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="form-text">La contraseña debe tener al menos 8 caracteres</div>
          </div>

          <div class="mb-4">
            <label class="form-label fw-medium">Confirmar nueva contraseña</label>
            <input type="password" class="form-control form-control-lg" placeholder="Confirme su nueva contraseña">
          </div>

          <h5 class="mt-4 mb-3">Verificación en Dos Pasos</h5>
          <div class="switch-container">
            <div class="switch-label">
              <h6 class="mb-0">Autenticación por SMS</h6>
              <p class="mb-0 text-muted small">Verificación mediante mensaje de texto</p>
            </div>
            <label class="toggle-switch">
              <input type="checkbox">
              <span class="slider"></span>
            </label>
          </div>

          <div class="switch-container">
            <div class="switch-label">
              <h6 class="mb-0">Autenticación por Correo</h6>
              <p class="mb-0 text-muted small">Verificación mediante correo electrónico</p>
            </div>
            <label class="toggle-switch">
              <input type="checkbox" checked>
              <span class="slider"></span>
            </label>
          </div>

          <button type="submit" class="btn btn-warning btn-lg w-100 mt-3">
            <i class="fas fa-sync-alt me-2"></i>Actualizar Contraseña
          </button>
        </form>
      </div>
    </div>

    <!-- Apariencia -->
    <div class="config-card">
      <div class="card-header bg-primary text-white">
        <i class="fas fa-palette"></i> Apariencia
      </div>
      <div class="card-body">
        <h5 class="mb-3">Tema</h5>
        <div class="row mb-4">
          <div class="col-4">
            <div class="theme-selector" data-theme="light">
              <i class="fas fa-sun"></i>
              <h6>Claro</h6>
            </div>
          </div>
          <div class="col-4">
            <div class="theme-selector active" data-theme="dark">
              <i class="fas fa-moon"></i>
              <h6>Oscuro</h6>
            </div>
          </div>
          <div class="col-4">
            <div class="theme-selector" data-theme="default">
              <i class="fas fa-adjust"></i>
              <h6>Default</h6>
            </div>
          </div>
        </div>

        <h5 class="mt-4 mb-3">Personalización</h5>
        <div class="row">
          <div class="col-6 mb-3">
            <label class="form-label fw-medium">Color primario</label>
            <input type="color" class="form-control form-control-color" value="#2c3e50" title="Elige tu color primario">
          </div>
          <div class="col-6 mb-3">
            <label class="form-label fw-medium">Color secundario</label>
            <input type="color" class="form-control form-control-color" value="#3498db" title="Elige tu color secundario">
          </div>
          <div class="col-6 mb-3">
            <label class="form-label fw-medium">Color de acento</label>
            <input type="color" class="form-control form-control-color" value="#ff9900" title="Elige tu color de acento">
          </div>
          <div class="col-6 mb-3">
            <label class="form-label fw-medium">Densidad</label>
            <select class="form-select form-control-lg">
              <option value="compacto">Compacto</option>
              <option value="normal" selected>Normal</option>
              <option value="espaciado">Espaciado</option>
            </select>
          </div>
        </div>

        <h5 class="mt-4 mb-3">Fuentes</h5>
        <select class="form-select form-control-lg mb-3">
          <option selected>Open Sans</option>
          <option>Roboto</option>
          <option>Montserrat</option>
          <option>Poppins</option>
        </select>

        <div class="form-check form-switch mb-3">
          <input class="form-check-input" type="checkbox" id="fontSmoothSwitch" checked>
          <label class="form-check-label" for="fontSmoothSwitch">Suavizado de fuentes</label>
        </div>

        <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="animationSwitch" checked>
          <label class="form-check-label" for="animationSwitch">Animaciones</label>
        </div>

        <button class="btn btn-primary btn-lg w-100 mt-4">
          <i class="fas fa-save me-2"></i>Guardar Personalización
        </button>
      </div>
    </div>
  </div>

  <div class="config-row">
    <div class="config-card system-card">
      <div class="card-header bg-secondary text-white">
        <i class="fas fa-cog"></i> Sistema
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <h5 class="mb-4">Información del Sistema</h5>

            <div class="system-metric">
              <div class="metric-label">Versión</div>
              <div class="metric-value">1.2.0</div>
            </div>

            <div class="system-metric">
              <div class="metric-label">Última actualización</div>
              <div class="metric-value">15 Nov 2023</div>
            </div>

            <div class="system-metric">
              <div class="metric-label">Soporte</div>
              <div class="metric-value">soporte@prodigios.edu</div>
            </div>

            <div class="system-metric">
              <div class="metric-label">Estado</div>
              <div class="metric-value">Operativo</div>
            </div>

            <div class="system-metric">
              <div class="metric-label">Licencia</div>
              <div class="metric-value">Premium</div>
            </div>

            <div class="system-metric">
              <div class="metric-label">Próxima actualización</div>
              <div class="metric-value">15 Dic 2023</div>
            </div>
          </div>

          <div class="col-md-6">
            <h5 class="mb-4">Recursos del Sistema</h5>

            <div class="mb-4">
              <div class="d-flex justify-content-between mb-2">
                <div>
                  <h6 class="mb-0">Almacenamiento</h6>
                  <p class="mb-0 text-muted small">15.8 GB de 50 GB usados</p>
                </div>
                <div class="text-primary">31.6%</div>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar" role="progressbar" style="width: 31.6%;" aria-valuenow="31.6" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="d-flex justify-content-between mb-2">
                <div>
                  <h6 class="mb-0">Base de Datos</h6>
                  <p class="mb-0 text-muted small">2.4 MB de 100 MB usados</p>
                </div>
                <div class="text-success">2.4%</div>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 2.4%;" aria-valuenow="2.4" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="d-flex justify-content-between mb-2">
                <div>
                  <h6 class="mb-0">Uso de CPU</h6>
                  <p class="mb-0 text-muted small">Promedio de los últimos 30 días</p>
                </div>
                <div class="text-info">42%</div>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-info" role="progressbar" style="width: 42%;" aria-valuenow="42" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="mb-4">
              <div class="d-flex justify-content-between mb-2">
                <div>
                  <h6 class="mb-0">Memoria</h6>
                  <p class="mb-0 text-muted small">1.2 GB de 4 GB usados</p>
                </div>
                <div class="text-warning">30%</div>
              </div>
              <div class="progress" style="height: 8px;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button class="btn btn-outline-secondary btn-lg">
                <i class="fas fa-sync-alt me-2"></i>Buscar Actualizaciones
              </button>
              <button class="btn btn-secondary btn-lg">
                <i class="fas fa-cloud-download-alt me-2"></i>Actualizar Sistema
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>