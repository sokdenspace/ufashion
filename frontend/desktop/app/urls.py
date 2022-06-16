from django.urls import path
from . import views

urlpatterns = [
    path('', views.home, name='Home'),
    path('account/', views.account, name='Account'),
    path('cart/', views.cart, name='Cart'),
    path('checkout/', views.checkout, name='Checkout'),
    path('contact/', views.contact, name='Contact'),
    path('detail/', views.detail, name='Detail'),
    path('product/', views.product, name='product'),
    path('login/', views.login, name='Login'),
    path('wishlist/', views.wishlist, name='Wishlist'),
]