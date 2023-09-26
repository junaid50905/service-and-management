import React from "react";
import { Link } from "react-router-dom";
import { AiFillDashboard } from "react-icons/ai";
import { GiAutoRepair } from "react-icons/gi";
import { FaTools } from "react-icons/fa";
import { MdEngineering } from "react-icons/md";
import { MdSpatialTracking } from "react-icons/md";

const SideNav = () => {
  return (
    <div className="w-1/5 h-screen text-center sidenav bg-navBody text-navColor">
      <nav>
        <ui>
          <li>
            <Link to="/dashboard">
              <div className="flex justify-center pt-4">
                <AiFillDashboard className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">Dashboard</div>
            </Link>
          </li>
          <li>
            <Link to="/dashboard">
              <div className="flex justify-center pt-4">
                <GiAutoRepair className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">
                Maintenance Order
              </div>
            </Link>
          </li>
          <li>
            <Link to="/dashboard">
              <div className="flex justify-center pt-4">
                <FaTools className="w-6 h-6" />
              </div>
              <div className="flex justify-center pb-4 mt-1">Spare Parts</div>
            </Link>
          </li>
          <li>
            <Link to="/dashboard">
              <div className="flex justify-center pt-4">
                <MdEngineering className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">
                Maintenance Engineers
              </div>
            </Link>
          </li>
          <li>
            <Link to="/dashboard">
              <div className="flex justify-center pt-4">
                <MdSpatialTracking className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">Tracking</div>
            </Link>
          </li>
        </ui>
      </nav>
    </div>
  );
};

export default SideNav;
