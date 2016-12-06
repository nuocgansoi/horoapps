const trans = (code) => {
  const maps = {
    login: 'Login',
  };
  return maps[code] || code;
};
