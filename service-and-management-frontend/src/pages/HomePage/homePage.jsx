import React from "react";
import { Link } from "react-router-dom"; // Import Link from React Router
import {
  FaFacebook,
  FaTwitter,
  FaInstagram,
  FaShoppingCart,
} from "react-icons/fa";
import AllProducts from "../../components/Products/allProducts";
import logo from "../../assets/images/aamra-companies.png";

function HomePage() {
  return (
    <div className="bg-gray-100">
      {/* Header */}
      <header className="p-4 bg-white shadow-lg">
        <div className="container mx-auto">
          <div className="flex items-center justify-between">
            <div className="p-2 bg-gray-900 rounded logo">
              <Link to="/">
                <img
                  src={logo}
                  alt="k"
                />
              </Link>
            </div>
            <div className="navigation">
              <ul className="flex ">
                <li>
                  <Link to="/">Home</Link>
                </li>
                <li>
                  <Link to="/shop">Shop</Link>
                </li>
                <li>
                  <Link to="/about">About</Link>
                </li>
                <li>
                  <Link to="/contact">Contact</Link>
                </li>
              </ul>
            </div>
            <div className="flex gap-4">
              <Link
                to="/login"
                className="px-4 py-2 text-white bg-indigo-600 rounded-md"
              >
                Sign In
              </Link>
              <Link
                to="/register"
                className="px-4 py-2 text-white bg-green-600 rounded-md"
              >
                Sign Up
              </Link>
              <Link to="/cart" className="py-2 ml-4 text-gray-800">
                <FaShoppingCart className="w-6 h-6" />
              </Link>
            </div>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="py-16 text-white bg-gray-900">
        <div className="container mx-auto text-center">
          <h1 className="mb-4 text-4xl font-semibold">
            Welcome to Your Online Store
          </h1>
          <p className="mb-8 text-lg">
            Discover amazing products at great prices.
          </p>
          <a
            href="/shop"
            className="px-6 py-2 text-lg text-white bg-blue-500 rounded-full hover:bg-blue-600"
          >
            Shop Now
          </a>
        </div>
      </section>

      {/* Featured Products */}
      <section className="py-12">
        <div className="container mx-auto">
          <h2 className="mb-6 text-3xl font-semibold text-gray-800">
            Featured Products
          </h2>
          <div className="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            <AllProducts />
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="p-3 text-white bg-gray-900">
        <div className="container flex items-center justify-between">
          <div className="flex gap-4 py-3 social-icons">
            <Link to="#" className="mr-2 text-white">
              <FaFacebook /> {/* Use React Icons */}
            </Link>
            <Link to="#" className="mr-2 text-white">
              <FaTwitter /> {/* Use React Icons */}
            </Link>
            <Link to="#" className="mr-2 text-white">
              <FaInstagram /> {/* Use React Icons */}
            </Link>
          </div>
          <div>
            <p>
              &copy; {new Date().getFullYear()} Aamra Power Of WE. All rights
              reserved.
            </p>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default HomePage;
