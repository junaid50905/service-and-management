import React from "react";
import { Link } from "react-router-dom";
import { FaFacebook, FaTwitter, FaInstagram } from "react-icons/fa";
import  AIL  from "../../assets/images/aamra-companies.png";

const Footer = () => {
  return (
    <>
      <footer className="p-3 text-white bg-gray-900">
        <div className="container flex items-center justify-between">
          <div className="flex gap-4 py-3 social-icons">
            <Link to="#" className="mr-2 text-white">
              <FaFacebook />
            </Link>
            <Link to="#" className="mr-2 text-white">
              <FaTwitter />
            </Link>
            <Link to="#" className="mr-2 text-white">
              <FaInstagram />
            </Link>
          </div>
          <div>
            <p>
              &copy; {new Date().getFullYear()} Aamra Power Of WE. All rights
              reserved.
            </p>
          </div>
          <div className="flex items-center gap-3">
            <div>
            <p>Powered by:</p>
            </div>
            <div className="w-64">
              <img src={AIL} alt="logo" />
            </div>
          </div>
        </div>
      </footer>
    </>
  );
};

export default Footer;
