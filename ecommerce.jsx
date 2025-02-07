"use client";
import { useEffect } from "react";

export default function Widget() {
  useEffect(() => {
    const cartButton = document.querySelector(".cart-button");
    if (cartButton) {
      cartButton.addEventListener("click", () => {
        alert("Added to cart!");
      });
    }

    return () => {
      if (cartButton) {
        cartButton.removeEventListener("click", () => {
          alert("Added to cart!");
        });
      }
    };
  }, []);

  return (
    <>
      <nav className="sticky top-0 bg-gray-100 shadow-lg">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16 items-center">
            <div className="flex items-center">
              <span className="text-2xl font-bold text-blue-600">EcomStore</span>
            </div>

            <div className="hidden md:flex space-x-8">
              <a href="#" className="text-sm font-medium text-gray-800 hover:text-blue-600">
                Home
              </a>
              <a href="#" className="text-sm font-medium text-gray-800 hover:text-blue-600">
                Products
              </a>
              <a href="#" className="text-sm font-medium text-gray-800 hover:text-blue-600">
                Categories
              </a>
              <a href="#" className="text-sm font-medium text-gray-800 hover:text-blue-600">
                Contact
              </a>
            </div>

            <button className="cart-button p-2 rounded-lg bg-gray-200 hover:bg-gray-300 text-gray-900">
              <img alt="shopping cart" src="https://placehold.co/24x24?text=🛒" />
            </button>
          </div>
        </div>
      </nav>

      <div className="bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
          <div className="text-center">
            <h1 className="text-4xl font-bold text-gray-900 mb-4">Discover Amazing Products</h1>
            <p className="text-lg text-gray-600 mb-8">Shop from our wide range of products</p>
            <button className="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-500 transition-colors">
              Get Started
            </button>
          </div>
        </div>
      </div>

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
          {[1, 2].map((num) => (
            <div key={num} className="bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow">
              <img src="https://placehold.co/400x300" alt={`Product ${num}`} className="w-full h-full object-cover" />
              <div className="p-4">
                <h3 className="font-medium text-gray-900 mb-2">Product {num}</h3>
                <p className="text-sm text-gray-600 mb-4">Description for product {num}</p>
                <div className="flex justify-between items-center">
                  <span className="font-medium text-blue-600">${num * 50 + 49.99}</span>
                  <button className="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-500">
                    Add to Cart
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>

      <footer className="bg-gray-100 text-gray-900">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
              <h3 className="font-medium mb-4">About Us</h3>
              <p className="text-sm text-gray-600">EcomStore is your one-stop shop for all your needs.</p>
            </div>
            <div>
              <h3 className="font-medium mb-4">Quick Links</h3>
              <ul className="space-y-2 text-sm">
                <li>
                  <a href="#" className="text-gray-600 hover:text-gray-900">
                    Home
                  </a>
                </li>
                <li>
                  <a href="#" className="text-gray-600 hover:text-gray-900">
                    Products
                  </a>
                </li>
                <li>
                  <a href="#" className="text-gray-600 hover:text-gray-900">
                    Categories
                  </a>
                </li>
                <li>
                  <a href="#" className="text-gray-600 hover:text-gray-900">
                    Contact
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="font-medium mb-4">Follow Us</h3>
              <div className="flex space-x-4">
                <a href="#" className="text-sm text-gray-600 hover:text-gray-900">
                  <img alt="facebook" src="https://placehold.co/24x24?text=Facebook" />
                </a>
                <a href="#" className="text-sm text-gray-600 hover:text-gray-900">
                  <img alt="twitter" src="https://placehold.co/24x24?text=Twitter" />
                </a>
                <a href="#" className="text-sm text-gray-600 hover:text-gray-900">
                  <img alt="instagram" src="https://placehold.co/24x24?text=Instagram" />
                </a>
              </div>
            </div>
            <div>
              <h3 className="font-medium mb-4">Contact</h3>
              <p className="text-sm text-gray-600">support@ecomstore.com</p>
              <p className="text-sm text-gray-600">+1 234 567 890</p>
            </div>
          </div>
          <div className="mt-8 pt-8 border-t border-gray-300">
            <p className="text-center text-sm text-gray-600">© 2023 EcomStore. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </>
  );
}