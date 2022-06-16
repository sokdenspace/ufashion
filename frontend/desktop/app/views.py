from django.shortcuts import render
from django.http import HttpResponse

# Create Menus
def home(request):
    return render(request, "Home/home.html")
    
def account(request):
    return render(request, "Account/account.html")

def cart(request):
    return render(request, "Cart/cart.html")
    
def checkout(request):
    return render(request, "Checkout/checkout.html")
    
def contact(request):
    return render(request, "Contact/contact.html")
    
def detail(request):
    return render(request, "Detail/detail.html")
    
def product(request):
    return render(request, "Product/product.html")

def login(request):
    return render(request, "Login/login.html")
    
def wishlist(request):
    return render(request, "Wishlist/wishlist.html")