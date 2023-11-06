import { createSlice } from "@reduxjs/toolkit";

const initialState = {
  email: "",
};

export const userSlice = createSlice({
  name: "user_info",
  initialState,
  reducers: {
    setUserInfo: (state, action) => {
      state.email += action.payload.email;
    },
    unsetUserInfo: (state, action) => {
      state.email += action.payload.email;
    },
  },
});

export const { setUserInfo, unsetUserInfo } = userSlice.actions;

export default userSlice.reducer;
