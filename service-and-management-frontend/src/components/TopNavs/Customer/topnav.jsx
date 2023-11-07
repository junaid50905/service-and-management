import React, { useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { getToken, removeToken } from "../../../services/localStorageService";
import { useLogoutUserMutation } from "../../../services/userAuthApi";
import { useGetLoggedUserQuery } from "../../../services/userAuthApi";
import { useDispatch } from "react-redux";
import { setUserInfo, unsetUserInfo } from "../../../features/userSlice";
import { useSelector } from "react-redux";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faRightFromBracket, faBell } from "@fortawesome/free-solid-svg-icons";

const TopNav = () => {
  const userInfo = useSelector((state) => state.user);
  const dispatch = useDispatch();
  const navigate = useNavigate();
  const [logoutUser] = useLogoutUserMutation();
  const handleLogout = async () => {
    const response = await logoutUser({ token });
    if (response.data) {
      if (response.data.status === "success") {
        dispatch(
          unsetUserInfo({
            email: "",
          })
        );
        navigate("/login");
      }
    }
  };

  const token = getToken();

  const { data, isSuccess } = useGetLoggedUserQuery(token);

  //Redux Storage
  useEffect(() => {
    if (data && isSuccess && !userInfo.email) {
      dispatch(
        setUserInfo({
          email: data.user.email,
        })
      );
    }
  }, [data, isSuccess, dispatch]);

  return (
    <div className="fixed h-16 bg-[#F2F5FC] topnav z-40 shadow-md">
      <div className="flex justify-end h-full">
        <div className="h-full mr-6">
          <button
            onClick={handleLogout}
            className="flex items-center w-full h-full gap-3"
          >
            <span className="font-semibold ">Notification</span>
            <FontAwesomeIcon icon={faBell} />
          </button>
        </div>
        <div className="h-full mr-6">
          <button
            onClick={handleLogout}
            className="flex items-center w-full h-full gap-3"
          >
            <span className="font-semibold ">Sign Out</span>
            <FontAwesomeIcon icon={faRightFromBracket} />
          </button>
        </div>
      </div>
    </div>
  );
};

export default TopNav;
