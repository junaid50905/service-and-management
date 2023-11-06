import React, { useEffect } from "react";
import { Link, useNavigate } from "react-router-dom";
import { BiLogOut } from "react-icons/bi";
import aamraLogo from "../../../assets/images/aamra-logo.png";
import { getToken, removeToken } from "../../../services/localStorageService";
import { useLogoutUserMutation } from "../../../services/userAuthApi";
import { useGetLoggedUserQuery } from "../../../services/userAuthApi";
import { useDispatch } from "react-redux";
import { setUserInfo, unsetUserInfo } from "../../../features/userSlice";
import { useSelector } from "react-redux";

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
    <div className="fixed h-16 text-white bg-[#333333] topnav z-10">
      <nav className="h-full">
        <ul className="flex items-center justify-between h-full mx-4">
          <li className="ml-8">
            <Link to="/customer/servprogress">
              <img src={aamraLogo} alt="logo" />
            </Link>
          </li>
          <li>
            <div className="flex gap-8">
              <div className="text-2xl font-semibold font-roboto">
                <Link to="/customer/servprogress">{userInfo.email}</Link>
              </div>
              <div className="w-6">
                <button onClick={handleLogout} className="w-full h-full">
                  <BiLogOut className="w-full h-full" />
                </button>
              </div>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  );
};

export default TopNav;
