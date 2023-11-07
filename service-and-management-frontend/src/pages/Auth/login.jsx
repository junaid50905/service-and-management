import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import aamraLogo from "../../assets/images/aamra-logo.png";
import { useLoginUserMutation } from "../../services/userAuthApi";
import { storeToken } from "../../services/localStorageService";

const Login = () => {
  const [formData, setFormData] = useState({
    email: "",
    password: "",
  });

  const [message, setMessage] = useState("");

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData({
      ...formData,
      [name]: value,
    });
  };

  const navigate = useNavigate();

  const [loginUser] = useLoginUserMutation();

  const handleSubmit = async (e) => {
    e.preventDefault();
    if (formData.email && formData.password) {
      const response = await loginUser(formData);
      if (response.data) {
        if (response.data.status === "success") {
          storeToken(response.data.token);
          setMessage(response.data.message);
          navigate("/customer/servprogress");
        } else {
          setMessage(response.data.message);
        }
      } else {
        setMessage(response.error.data.message);
      }
    } else {
      setMessage("All Field Must Be Fill Up");
    }
  };

  return (
    <div className="flex items-center justify-center min-h-screen gap-12 px-4 py-12 bg-gray-50 sm:px-6 lg:px-8 font-roboto">
      <div className="flex items-center justify-center mb-3">
        <div className="px-6 py-2 rounded-md w-fit">
          <img src={aamraLogo} alt="logo" />
        </div>
      </div>
      <div className="w-full max-w-md p-6 space-y-8 bg-white rounded-lg shadow-md ">
        <div>
          <div>
            <h2 className="text-3xl font-extrabold text-center text-[#CD2628]">
              Login to Your Account
            </h2>
          </div>
          {message && (
            <div className="py-4 mt-4 warning">
              <p className="text-center text-red-500">{message}</p>
            </div>
          )}
        </div>
        <form className="mt-8 space-y-6 font-roboto" onSubmit={handleSubmit}>
          <div className="-space-y-px rounded-md shadow-sm">
            <div>
              <label htmlFor="email" className="sr-only ">
                Email address
              </label>
              <input
                id="email"
                name="email"
                type="email"
                autoComplete="email"
                required
                value={formData.email}
                onChange={handleChange}
                className="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                placeholder="Email address"
              />
            </div>
            <div>
              <label htmlFor="password" className="sr-only">
                Password
              </label>
              <input
                id="password"
                name="password"
                type="password"
                autoComplete="current-password"
                required
                value={formData.password}
                onChange={handleChange}
                className="relative block w-full px-3 py-2 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-none appearance-none rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                placeholder="Password"
              />
            </div>
          </div>
          <div className="flex items-center justify-between">
            <div className="flex items-center">
              <input
                id="remember-me"
                name="remember-me"
                type="checkbox"
                className="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
              />
              <label
                htmlFor="remember-me"
                className="block ml-2 text-sm text-gray-900"
              >
                Remember me
              </label>
            </div>

            <div className="text-sm">
              <a
                href="#"
                className="font-medium text-indigo-600 hover:text-indigo-500"
              >
                Forgot Password?
              </a>
            </div>
          </div>
          <div>
            <button
              type="submit"
              className="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md group hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 "
            >
              Sign in
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default Login;
