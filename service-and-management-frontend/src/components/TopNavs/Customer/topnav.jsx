import React from "react";
import { Link } from "react-router-dom";
import { BiLogOut } from "react-icons/bi";

const TopNav = () => {
  return (
    <div className="fixed h-16 text-white bg-topNavColor topnav">
      <nav className="h-full">
        <ul className="flex items-center justify-between h-full mx-4">
          <li>
            <Link to="/customer/servprogress">
              <h2 className="sam-logo">Service And Repair Management</h2>
            </Link>
          </li>
          <li>
            <Link
              to="/"
              className="mr-2 bg-blue-600 py-2 px-4 border-2 rounded-md text-lg hover:bg-blue-700"
            >
              Back
            </Link>
          </li>
        </ul>
      </nav>
    </div>
  );
};

export default TopNav;
