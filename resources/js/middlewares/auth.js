export function authMiddleware(to, from, next) {
    const isAuthenticated = localStorage.getItem('lawyer_web_token');
    
    if (to.path === '/admin' && isAuthenticated) {
      // If the user is authenticated and trying to access '/admin', redirect to '/admin/profile'
      next('/admin/profile');
    } else if (to.path.startsWith('/admin/profile')) {
      if (isAuthenticated) {
        // User is authenticated, allow access to the route
        next();
      } else {
        // User is not authenticated, redirect to login page
        next('/admin');
      }
    } else {
      // For routes outside of panel, continue as usual
      next();
    }
  }
  