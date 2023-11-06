import React from "react";
import logo from "../../../assets/images/aamra-companies.png";
import { FaShoppingCart } from "react-icons/fa";
import { Link } from "react-router-dom";
import { getToken } from "../../../services/localStorageService";

const Header = () => {
  const token = getToken();

  return (
    <>
      <header className="p-4 bg-white shadow-lg">
        <div className="container mx-auto">
          <div className="flex items-center justify-between">
            <div className="p-2 bg-gray-900 rounded logo">
              <Link to="/">
                <img src={logo} alt="logo" />
              </Link>
            </div>
            <div className="navigation">
              <ul className="flex ">
                <li>
                  <Link to="/">Home</Link>
                </li>
                <li>
                  <Link to="/">Shop</Link>
                </li>
                <li>
                  <Link to="/">About</Link>
                </li>
                <li>
                  <Link to="/">Contact</Link>
                </li>
              </ul>
            </div>
            {token ? ( // Check if token is available
              // Render the "has token" part
              <div className="flex gap-6">
                <Link
                  to="/customer/servprogress"
                  className="text-lg font-bold text-indigo-500"
                >
                  Service & Management
                </Link>
              </div>
            ) : (
              // Render the "no token" part
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
            )}
          </div>
        </div>
      </header>
    </>
  );
};

export default Header;
