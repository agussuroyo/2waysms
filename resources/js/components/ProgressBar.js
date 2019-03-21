import React from 'react';

class ProgressBar extends React.Component {
    render() {
        
        let percent = this.props.percent + '%';        
        let inlineStyle = {
            width: percent
        };
        
        return (
                <div className={`progress mb-${this.props.mb}`}>
                    <div className="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style={inlineStyle} aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">{percent}</div>
                </div>
                );
    }
}

ProgressBar.defaultProps = {
    mb: 3,
    percent: 0
}

export default ProgressBar;