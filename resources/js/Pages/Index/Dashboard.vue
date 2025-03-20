<template>
    <div class="d-flex vh-100">
      <!-- Sidebar -->
      <aside class="sidebar">
        <h5 class="px-3 mt-3">Start</h5>
        <ul class="nav flex-column">
          <li v-for="item in sidebarItems" :key="item.name" class="nav-item">
            <a href="#" class="nav-link d-flex align-items-center">
              <i :class="item.icon"></i> <span class="ms-2">{{ item.name }}</span>
            </a>
          </li>
        </ul>
      </aside>
  
      <!-- Main Content -->
      <main class="content">
        <div class="top-bar d-flex justify-content-between align-items-center px-3 py-2">
          <button class="btn btn-primary">Insert</button>
          <button class="btn btn-outline-secondary">Publish</button>
        </div>
        <div class="workspace">
          <div class="frame">
            <p class="text-center text-muted">Desktop 1200</p>
          </div>
        </div>
      </main>
  
      <!-- Right Panel -->
      <aside class="right-panel">
        <h6 class="px-3 mt-3">Welcome to Framer</h6>
        <ul class="list-group">
          <li class="list-group-item" v-for="step in steps" :key="step.name">
            <button class="btn btn-link">{{ step.name }}</button>
          </li>
        </ul>
      </aside>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        sidebarItems: [
          { name: "Pages", icon: "bi bi-columns" },
          { name: "Sections", icon: "bi bi-grid" },
          { name: "Navigation", icon: "bi bi-menu-button" },
          { name: "Menus", icon: "bi bi-list" },
          { name: "Collections", icon: "bi bi-database" },
          { name: "Fields", icon: "bi bi-ui-checks-grid" },
        ],
        steps: [
          { name: "Watch the tutorial" },
          { name: "Try a template" },
          { name: "Start from Figma" },
          { name: "Import your site" },
          { name: "Get desktop app" },
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  /* Sidebar */
  .sidebar {
    width: 250px;
    background: #f8f9fa;
    border-right: 1px solid #ddd;
    padding-top: 10px;
  }
  
  /* Main Content */
  .content {
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  
  .top-bar {
    background: #fff;
    border-bottom: 1px solid #ddd;
  }
  
  .workspace {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f0f0f0;
  }
  
  .frame {
    width: 80%;
    height: 80%;
    background: white;
    border: 2px solid #007bff;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  /* Right Panel */
  .right-panel {
    width: 300px;
    background: #f8f9fa;
    border-left: 1px solid #ddd;
    padding-top: 10px;
  }
  </style>
  