import React from "react";
import { Link } from "react-router-dom";
import { AiFillDashboard } from "react-icons/ai";
import { BiLogOut } from "react-icons/bi";

const TopNav = () => {
  return (
    <div className="fixed w-full h-16 text-white bg-topNavColor topnav">
      <nav className="h-full">
        <ui className="flex items-center justify-between h-full mx-4">
          <li>
            <Link to="/dashboard">
              <h2 className="sam-logo">Service And Repair Management</h2>
            </Link>
          </li>
          <li>
            <Link to="/dashboard">
              <BiLogOut className="w-6 h-6" />
            </Link>
          </li>
        </ui>
      </nav>
    </div>
  );
};

export default TopNav;