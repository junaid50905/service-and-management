import React from "react";
import { NavLink } from "react-router-dom";
import { AiFillDashboard } from "react-icons/ai";
import { GiAutoRepair } from "react-icons/gi";
import { FaTools } from "react-icons/fa";
import { MdEngineering } from "react-icons/md";
import { MdSpatialTracking } from "react-icons/md";
import { IoMdArrowDropupCircle } from "react-icons/io";
import { IoMdArrowDropdownCircle } from "react-icons/io";
import { useState } from "react";

const AdminSideNav = () => {
  const [engneerSubMenu, setEngineerSubMenu] = useState(false);
  const handleEngineer = () => {
    setEngineerSubMenu((prevState) => !prevState);
  };

  const [partsSubMenu, setPartsSubMenu] = useState(false);
  const handleParts = () => {
    setPartsSubMenu((prevState) => !prevState);
  };

  return (
    <div className="fixed h-screen text-center sidenav bg-navBody text-navColor">
      <nav>
        <ul>
          <li>
            <NavLink
              to="/dashboard"
              style={({ isActive }) => ({
                color: isActive ? "#020553" : "#f65522",
              })}
            >
              <div className="flex justify-center pt-4">
                <AiFillDashboard className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">Dashboard</div>
            </NavLink>
          </li>
          <li>
            <NavLink
              to="/ManageOrder"
              style={({ isActive }) => ({
                color: isActive ? "#020553" : "#f65522",
              })}
            >
              <div className="flex justify-center pt-4">
                <GiAutoRepair className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">
                Maintenance Order
              </div>
            </NavLink>
          </li>
          <li onClick={handleParts}>
            <div className="flex justify-center pt-4">
              <FaTools className="w-6 h-6" />
            </div>
            <div className="flex justify-center pb-4 mt-1">
              Spare Parts
              <div className="ml-1">
                {partsSubMenu ? (
                  <IoMdArrowDropupCircle className="w-6 h-5 " />
                ) : (
                  <IoMdArrowDropdownCircle className="w-6 h-5 " />
                )}
              </div>
            </div>
          </li>
          <ul className={partsSubMenu ? "block" : "hidden"}>
            <li className="p-4">
              <NavLink
                to="/newPart"
                style={({ isActive }) => ({
                  color: isActive ? "#020553" : "#f65522",
                })}
              >
                Add New Spare Part
              </NavLink>
            </li>
            <li className="p-4">
              <NavLink
                to="/showParts"
                style={({ isActive }) => ({
                  color: isActive ? "#020553" : "#f65522",
                })}
              >
                View All Spare Parts
              </NavLink>
            </li>
          </ul>
          <li onClick={handleEngineer}>
            <div className="flex justify-center pt-4">
              <MdEngineering className="w-8 h-8" />
            </div>
            <div className="flex justify-center pb-4 mt-1">
              Maintenance Engineers
              <div className="ml-1">
                {engneerSubMenu ? (
                  <IoMdArrowDropupCircle className="w-6 h-5 " />
                ) : (
                  <IoMdArrowDropdownCircle className="w-6 h-5 " />
                )}
              </div>
            </div>
          </li>
          <ul className={engneerSubMenu ? "block" : "hidden"}>
            <li className="p-4">
              <NavLink
                to="/newEngineer"
                style={({ isActive }) => ({
                  color: isActive ? "#020553" : "#f65522",
                })}
              >
                Add New Engineer
              </NavLink>
            </li>
            <li className="p-4">
              <NavLink
                to="/showEngineers"
                style={({ isActive }) => ({
                  color: isActive ? "#020553" : "#f65522",
                })}
              >
                View All Engineers
              </NavLink>
            </li>
          </ul>
          <li>
            <NavLink
              to="/TrackManage"
              style={({ isActive }) => ({
                color: isActive ? "#020553" : "#f65522",
              })}
            >
              <div className="flex justify-center pt-4">
                <MdSpatialTracking className="w-8 h-8" />
              </div>
              <div className="flex justify-center pb-4 mt-1">Tracking</div>
            </NavLink>
          </li>
        </ul>
      </nav>
    </div>
  );
};

export default AdminSideNav;
