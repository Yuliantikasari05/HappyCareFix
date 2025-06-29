import axios from "axios"
window.axios = axios

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"

// CSRF Token
const token = document.head.querySelector('meta[name="csrf-token"]')

if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content
} else {
  console.error("CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token")
}

// Request interceptor
axios.interceptors.request.use(
  (config) => {
    // Show loading indicator
    const loadingEl = document.getElementById("loading-indicator")
    if (loadingEl) {
      loadingEl.classList.remove("hidden")
    }
    return config
  },
  (error) => Promise.reject(error),
)

// Response interceptor
axios.interceptors.response.use(
  (response) => {
    // Hide loading indicator
    const loadingEl = document.getElementById("loading-indicator")
    if (loadingEl) {
      loadingEl.classList.add("hidden")
    }
    return response
  },
  (error) => {
    // Hide loading indicator
    const loadingEl = document.getElementById("loading-indicator")
    if (loadingEl) {
      loadingEl.classList.add("hidden")
    }

    // Handle common errors
    if (error.response) {
      switch (error.response.status) {
        case 401:
          window.location.href = "/login"
          break
        case 403:
          if (window.showToast) {
            window.showToast("Access denied", "error")
          }
          break
        case 404:
          if (window.showToast) {
            window.showToast("Resource not found", "error")
          }
          break
        case 422:
          // Validation errors
          if (error.response.data.errors) {
            const firstError = Object.values(error.response.data.errors)[0][0]
            if (window.showToast) {
              window.showToast(firstError, "error")
            }
          }
          break
        case 500:
          if (window.showToast) {
            window.showToast("Server error occurred", "error")
          }
          break
        default:
          if (window.showToast) {
            window.showToast("An error occurred", "error")
          }
      }
    }

    return Promise.reject(error)
  },
)
