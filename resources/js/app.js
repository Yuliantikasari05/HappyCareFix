import "./bootstrap"
import Alpine from "alpinejs"
import { createIcons } from "lucide" // Import Lucide icons

// Initialize Alpine.js
window.Alpine = Alpine
Alpine.start()

// Global utilities
window.formatCurrency = (amount) =>
  new Intl.NumberFormat("id-ID", {
    style: "currency",
    currency: "IDR",
    minimumFractionDigits: 0,
  }).format(amount)

window.formatNumber = (number) => new Intl.NumberFormat("id-ID").format(number)

// Smooth scroll utility
window.smoothScrollTo = (element) => {
  if (typeof element === "string") {
    element = document.querySelector(element)
  }
  if (element) {
    element.scrollIntoView({
      behavior: "smooth",
      block: "start",
    })
  }
}

// Toast notification utility
window.showToast = (message, type = "success") => {
  const toast = document.createElement("div")
  toast.className = `fixed top-20 right-4 z-50 max-w-sm p-4 rounded-lg shadow-lg transition-all duration-300 ${
    type === "success"
      ? "bg-green-50 border border-green-200 text-green-800"
      : type === "error"
        ? "bg-red-50 border border-red-200 text-red-800"
        : "bg-blue-50 border border-blue-200 text-blue-800"
  }`

  toast.innerHTML = `
        <div class="flex items-center">
            <i data-lucide="${type === "success" ? "check-circle" : type === "error" ? "alert-circle" : "info"}" 
               class="w-5 h-5 mr-3 ${type === "success" ? "text-green-600" : type === "error" ? "text-red-600" : "text-blue-600"}"></i>
            <p class="font-medium">${message}</p>
            <button onclick="this.parentElement.parentElement.remove()" 
                    class="ml-auto ${type === "success" ? "text-green-600 hover:text-green-800" : type === "error" ? "text-red-600 hover:text-red-800" : "text-blue-600 hover:text-blue-800"}">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    `

  document.body.appendChild(toast)

  // Initialize Lucide icons for the toast
  createIcons()

  // Auto remove after 5 seconds
  setTimeout(() => {
    toast.remove()
  }, 5000)
}

// Loading state utility
window.setLoading = (element, loading = true) => {
  if (typeof element === "string") {
    element = document.querySelector(element)
  }

  if (!element) return

  if (loading) {
    element.disabled = true
    element.classList.add("opacity-50", "cursor-not-allowed")

    // Add loading spinner if it's a button
    if (element.tagName === "BUTTON") {
      const originalText = element.innerHTML
      element.dataset.originalText = originalText
      element.innerHTML = `
                <div class="flex items-center justify-center">
                    <div class="w-4 h-4 mr-2 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                    Loading...
                </div>
            `
    }
  } else {
    element.disabled = false
    element.classList.remove("opacity-50", "cursor-not-allowed")

    // Restore original text if it's a button
    if (element.tagName === "BUTTON" && element.dataset.originalText) {
      element.innerHTML = element.dataset.originalText
      delete element.dataset.originalText
    }
  }
}

// Form validation utility
window.validateForm = (form) => {
  if (typeof form === "string") {
    form = document.querySelector(form)
  }

  if (!form) return false

  const requiredFields = form.querySelectorAll("[required]")
  let isValid = true

  requiredFields.forEach((field) => {
    if (!field.value.trim()) {
      field.classList.add("border-red-500")
      isValid = false
    } else {
      field.classList.remove("border-red-500")
    }
  })

  return isValid
}

// Debounce utility
window.debounce = (func, wait) => {
  let timeout
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout)
      func(...args)
    }
    clearTimeout(timeout)
    timeout = setTimeout(later, wait)
  }
}

// Initialize page-specific functionality
document.addEventListener("DOMContentLoaded", () => {
  // Initialize tooltips
  const tooltips = document.querySelectorAll("[data-tooltip]")
  tooltips.forEach((tooltip) => {
    tooltip.addEventListener("mouseenter", function () {
      const text = this.dataset.tooltip
      const tooltipEl = document.createElement("div")
      tooltipEl.className =
        "absolute z-50 px-2 py-1 text-sm text-white bg-gray-900 rounded shadow-lg pointer-events-none"
      tooltipEl.textContent = text
      tooltipEl.id = "tooltip-" + Math.random().toString(36).substr(2, 9)

      document.body.appendChild(tooltipEl)

      const rect = this.getBoundingClientRect()
      tooltipEl.style.left = rect.left + rect.width / 2 - tooltipEl.offsetWidth / 2 + "px"
      tooltipEl.style.top = rect.top - tooltipEl.offsetHeight - 5 + "px"

      this.dataset.tooltipId = tooltipEl.id
    })

    tooltip.addEventListener("mouseleave", function () {
      const tooltipEl = document.getElementById(this.dataset.tooltipId)
      if (tooltipEl) {
        tooltipEl.remove()
      }
    })
  })

  // Initialize lazy loading for images
  if ("IntersectionObserver" in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const img = entry.target
          if (img.dataset.src) {
            img.src = img.dataset.src
            img.classList.remove("lazy")
            imageObserver.unobserve(img)
          }
        }
      })
    })

    document.querySelectorAll("img[data-src]").forEach((img) => {
      imageObserver.observe(img)
    })
  }

  // Initialize smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        window.smoothScrollTo(target) // Use window.smoothScrollTo
      }
    })
  })

  // Initialize form enhancements
  document.querySelectorAll("form").forEach((form) => {
    form.addEventListener("submit", function (e) {
      if (!window.validateForm(this)) {
        // Use window.validateForm
        e.preventDefault()
        window.showToast("Please fill in all required fields", "error") // Use window.showToast
      }
    })
  })
})

// Performance monitoring
if ("performance" in window) {
  window.addEventListener("load", () => {
    const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart
    console.log("Page load time:", loadTime + "ms")

    // Report to analytics if needed
    if (loadTime > 3000) {
      console.warn("Page load time is slow:", loadTime + "ms")
    }
  })
}

// Error handling
window.addEventListener("error", (e) => {
  console.error("JavaScript error:", e.error)
  // You can send this to your error tracking service
})

// Service Worker registration (optional)
if ("serviceWorker" in navigator) {
  window.addEventListener("load", () => {
    navigator.serviceWorker
      .register("/sw.js")
      .then((registration) => {
        console.log("SW registered: ", registration)
      })
      .catch((registrationError) => {
        console.log("SW registration failed: ", registrationError)
      })
  })
}
