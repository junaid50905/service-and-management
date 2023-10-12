import React, { useState, useEffect } from "react";
import logo from "../../../assets/images/aamra-companies.png";
import { FaShoppingCart } from "react-icons/fa";
import { BiLogOut } from "react-icons/bi";
import { Link, useNavigate } from "react-router-dom";
import { getToken, removeToken } from "../../../services/localStorageService";

import { useLogoutUserMutation } from "../../../services/userAuthApi";
import { useGetLoggedUserQuery } from "../../../services/userAuthApi";

const Header = () => {
  const [userData, setUserData] = useState({
    email: "",
  });

  const navigate = useNavigate();
  const token = getToken();
  const [logoutUser] = useLogoutUserMutation();
  const handleLogout = async () => {
    const response = await logoutUser({ token });
    console.log(response);
    if (response.data) {
      if (response.data.status === "success") {
        removeToken("token");
        navigate("/login");
        console.log("success");
      }
    }
  };

  const { data, isSuccess } = useGetLoggedUserQuery(token);

  useEffect(() => {
    if (data && isSuccess) {
      setUserData({
        email: data.user.email,
      });
    }
  }, [data, isSuccess]);

  console.log(data);

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
            {token ? ( // Check if token is available
              // Render the "has token" part
              <div className="flex gap-6">
                <Link
                  to="/customer/servprogress"
                  className="font-bold text-gray-700 text-lg"
                >
                  {userData.email}
                </Link>
                <Link
                  to="/customer/servprogress"
                  className="font-bold text-indigo-500 text-lg"
                >
                  Service & Management
                </Link>
                <button onClick={handleLogout}>
                  <BiLogOut className="w-6 h-6" />
                </button>
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
