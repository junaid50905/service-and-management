import React from "react";
import { Link } from "react-router-dom";
import { BiLogOut } from "react-icons/bi";

const EngineerTopNav = () => {
  return (
    <div className="fixed h-16 text-white bg-topNavColor topnav">
      <nav className="h-full">
        <ul className="flex items-center justify-between h-full mx-4">
          <li>
            <Link to="/engineer/dashboard">
              <h2 className="sam-logo">Service And Repair Management</h2>
            </Link>
          </li>
          <li>
            <div className="flex gap-8 text-xl">
              <Link to="/engineer/dashboard">Engineer</Link>
              <Link to="/engineer/dashboard">
                <BiLogOut className="w-6 h-6" />
              </Link>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  );
};

export default EngineerTopNav;
